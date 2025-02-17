const divPadre=document.getElementById("eventojs")

async function obtenerRolUsuario() {
    try {
        const response = await fetch('/api/user-role', {
            credentials: 'include'  // Enviar cookies de sesión al servidor
        })

        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`)
        }

        const data = await response.json()
        return data.role
    } catch (error) {
        console.error('Error al obtener el rol:', error)
        return 'guest'
    }
}


async function obtenerDatos() {
    try {
        const userRole=await obtenerRolUsuario()
        const response=await fetch('/api/events')

        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`)
        }

        const data=await response.json()
        let likes=JSON.parse(localStorage.getItem('likes') || '[]')

        data.forEach((event)=> {
            const divItem=document.createElement('div')
            const enlace=document.createElement('a')

            enlace.href=`/events/${event.id}`
            enlace.textContent=`${event.name} -- ${event.date} : ${event.hour} -- ${event.location}`

            const boton=document.createElement('button')
            boton.setAttribute("title", "Like event")
            boton.classList.add('btnlike')

            const imagen=document.createElement('img')
            imagen.classList.add('like')

            const imglike='/img/likes/like.png'
            const imgsinlike='/img/likes/like_por_dar.png'

            let isLiked=false

            for (let i=0; i < likes.length; i++) {
                if (likes[i].id===event.id) {
                    isLiked=true
                }
            }

            if (isLiked===true) {
                imagen.src=imglike
            } else {
                imagen.src=imgsinlike
            }

            boton.appendChild(imagen)
            boton.addEventListener('click', ()=> {
                let likes=JSON.parse(localStorage.getItem('likes') || '[]')
                let eventoLikeado=false

                for (let i=0; i < likes.length; i++) {
                    if (likes[i].id===event.id) {
                        eventoLikeado=true
                    }
                }

                if (eventoLikeado===true) {
                    likes=likes.filter(like=> like.id !==event.id)
                    imagen.src=imgsinlike
                } else {
                    likes.push(event)
                    imagen.src=imglike
                }

                localStorage.setItem('likes', JSON.stringify(likes))
            })

            divItem.appendChild(enlace)
            divItem.appendChild(boton)

            if (userRole==='admin') {
                const btnEditar=document.createElement('button')
                btnEditar.textContent='Modificar'
                btnEditar.classList.add('btn-edit')

                btnEditar.addEventListener('click', ()=> {
                    window.location.href=`/events/${event.id}/edit`
                })

                const btnEliminar=document.createElement('button')
                btnEliminar.textContent='Eliminar'
                btnEliminar.classList.add('btn-delete')

                btnEliminar.addEventListener('click', async ()=> {
                    const confirmacion=confirm('¿Estás seguro de eliminar este evento?')

                    if (confirmacion===true) {
                        const deleteResponse=await fetch(`/events/${event.id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            }
                        })

                        if (deleteResponse.ok) {
                            divItem.remove()
                        } else {
                            alert('Error al eliminar el evento')
                        }
                    }
                })

                divItem.appendChild(btnEditar)
                divItem.appendChild(btnEliminar)
            }

            divPadre.appendChild(divItem)
        })

        console.log('Datos:', data)
    } catch (error) {
        console.error('Error:', error)
    }
}

obtenerDatos()
const userRole = obtenerRolUsuario()
console.log('Rol del usuario:', userRole)

