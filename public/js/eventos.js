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
        //const response=await fetch('/api/events/$id')

        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`)
        }

        const data=await response.json()
        let likes=JSON.parse(localStorage.getItem('likes') || '[]')

        data.forEach((event)=> {
            const divItem=document.createElement('div')
            const descripcionEvento=document.createElement('h5')

            descripcionEvento.textContent=`${event.name} -- ${event.date} : ${event.hour} -- ${event.location}`

            const botonMostrar=document.createElement('button')
            botonMostrar.innerText='Mas detalles'
            botonMostrar.addEventListener("click", ()=> mostrar(event))

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
                    console.log('entra')
                    likes=likes.filter(like=> like.id !==event.id)
                    imagen.src=imgsinlike
                } else {
                    likes.push(event)
                    imagen.src=imglike
                }

                localStorage.setItem('likes', JSON.stringify(likes))
            })

            divItem.appendChild(descripcionEvento)
            divItem.appendChild(boton)
            divItem.appendChild(botonMostrar)

            if (userRole==='admin') {
                const btnEditar=document.createElement('button')
                btnEditar.textContent='Modificar'
                btnEditar.classList.add('btn-edit')

                btnEditar.addEventListener('click', ()=> {
                    editar(event)
                })

                const btnEliminar=document.createElement('button')
                btnEliminar.textContent='Eliminar'
                btnEliminar.classList.add('btn-delete')

                btnEliminar.addEventListener('click', async ()=> {
                    const confirmacion=confirm('¿Estás seguro de eliminar este evento?')

                    if (confirmacion===true) {
                        const deleteResponse=await fetch(`/api/events/${event.id}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        })

                        if (deleteResponse.ok) {
                            window.location.reload()
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


function mostrar(event){
    console.log(event)
    divPadre.innerHTML=`<div class="card">
                            <h2 class="datoEvento">${event.description}</h2>
                            <h2 class="datoEvento">${event.location}</h2>
                            <h2 class="datoEvento">${event.type}</h2>
                            <h2class="datoEvento">${event.tags}</h2>
                            <div id="divNuev">
`
const divAux=document.getElementById('divNuev')
const divtemp=document.createElement('div')
divAux.appendChild(divtemp)


const boton=document.createElement('button')
boton.setAttribute("title", "Like event")
boton.classList.add('btnlike')
let likes=JSON.parse(localStorage.getItem('likes') || '[]')

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
    divAux.appendChild(boton)

}


function editar(event){


    divPadre.innerHTML=`<form action=""class="">
    <label for="name">Nombre</label>
    <input type="text" id="name" name="name" value="${event.name}">
    <br>
    <label for="description">Descripcion</label>
    <input type="text" id="description" name="description" value="${event.description}">
    <br>
    <label for="location">localizacion</label>
    <input type="text" id="location" name="location" value="${event.location}">
    <br>
    <label for="date">Fecha</label>
    <input type="date" id="date" name="date" value="${event.date}">
    <br>
    <label for="hour">Hora</label>
    <input type="time" id="hour" name="hour" value="${event.hour}">
    <br>
    <label for="type">Tipo</label>
    <select name="type" id="type" value="${event.type}">
        <option value="official">Official</option>
        <option value="exhibition">Exhibition</option>
        <option value="charity">Charity</option>
    </select>
    <br>
    <label for="tags">Etiquetas</label>
    <input type="text" id="tags" name="tags" value="${event.tags}">
    <br>
    <label for="visible">Visibilidad</label>
    <select id="visible" name="visible" value="${event.visible}">
        <option value="0">Oculto</option>
        <option value="1">Visible</option>
    </select>
</form>`

const labelname=document.getElementById('name')
const labeldescription=document.getElementById('description')
const labellocation=document.getElementById('location')
const labeldate=document.getElementById('date')
const labeltime=document.getElementById('hour')
const labeltype=document.getElementById('type')
const labeltags=document.getElementById('tags')
const labelvisible=document.getElementById('visible')

    eventoActualizado={
        name: labelname.value,
        description:  labeldescription.value,
        location:  labellocation.value,
        date:  labeldate.value,
        time:  labeltime.value,
        type:  labeltype.value,
        tags:  labeltags.value,
        visible:  labelvisible.value 
    }



const btnEditar=document.createElement('button')
btnEditar.textContent='Guardar'

btnEditar.addEventListener('click', async ()=> {
    const confirmacion=confirm('¿Estás seguro de actualizar este evento?')
    console.log(eventoActualizado)

    if (confirmacion===true) {
        fetch(`/api/events/${event.id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body:JSON.stringify(eventoActualizado)
        })
        .then((response)=>{
            if(response.ok){
                return response.json()
            }else{
                throw new Error('Error al actualizar evento')
            }
        })
        //.then(window.location.reload())
        .catch((error)=>{
            console.log(error)
            alert(error.message)
        })


    }
})
divPadre.appendChild(btnEditar)
}

