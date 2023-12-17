<h1>Desafio API rest Laravel TelePagos</h1>
    
- Se desea armar una API que permita:

- Consumir PokeApi para obtener y guardar una lista de 15 Pokemones. 

- Crear y listar equipos de hasta 3 pokemones, el equipo tiene que estar vinculado a un entrenador.


------------

<h1>Crear lista de 15 pokemones</h1>
<h4>GET http://localhost:8000/api/import-pokemon</h4> 
<h3>Mostrar la lista</h3>
<h4>GET http://localhost:8000/api/import-pokemon-list</h4> 

<h1>Entrenadores</h1>
<h4>Crear entrenador</h4>

```
//POST
//Ruta: http://localhost:8000/api/entrenadores

{
 "nombre" : "Ash ketchum"
}

```
<h3>Listar entrenadores</h3>

<h4>GET index http://localhost:8000/api/entrenadores</h4>
<h4>GET show http://localhost:8000/api/entrenadores/{id}</h4>

<h1>Equipos</h1>
<h4>Crear un equipo</h4>

```
//POST
//Ruta: http://localhost:8000/api/equipos

{
 "nombre" : "Equipo Onix", //Nombre del equipo
 "entrenadores_id" : "3" //id del entrenador
}
```

<h3>Listar equipos</h3>

<h4>GET index http://localhost:8000/api/equipos</h4>

<h1>Equipos de Pokemones</h1>
<h4>Crear un equipo con maximo 3 pokemones</h4>

```
//POST
//Ruta: http://localhost:8000/api/equipos_pokemones

{
 "orden" : "1", //orden del pokemon "1", "2" o "3"
 "pokemones_id" : "34", //id del pokemon
 "equipos_id" : "1" //id del equipo
}

```
<h3>Listar equipos de pokemones</h3>

<h4>GET index http://localhost:8000/api/equipos_pokemones</h4>
