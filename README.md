#Desafio API rest Laravel TelePagos
- Se desea armar una API que permita:

- Consumir PokeApi para obtener y guardar una lista de 15 Pokemones. 

- Crear y listar equipos de hasta 3 pokemones, el equipo tiene que estar vinculado a un entrenador.


------------

#Crear lista de 15 pokemones
#### GET http://localhost:8000/api/import-pokemon
###Mostrar la lista
#### GET http://localhost:8000/api/import-pokemon-list

#Entrenadores
####Crear entrenador
```
//POST
//Ruta: http://localhost:8000/api/entrenadores

{
	"nombre" : "Ash ketchum"
}

```
###Listar entrenadores

####GET index http://localhost:8000/api/entrenadores
####GET show http://localhost:8000/api/entrenadores/{id}

#Equipos
####Crear un equipo
```
//POST
//Ruta: http://localhost:8000/api/equipos

{
	"nombre" : "Equipo Onix", //Nombre del equipo
	"entrenadores_id" : "3" //id del entrenador
}

```
###Listar equipos

####GET index http://localhost:8000/api/equipos

#Equipos de Pokemones
####Crear un equipo con maximo 3 pokemones
```
//POST
//Ruta: http://localhost:8000/api/equipos_pokemones

{
	"orden" : "1", //orden del pokemon "1", "2" o "3"
	"pokemones_id" : "34", //id del pokemon
	"equipos_id" : "1" //id del equipo
}

```
###Listar equipos de pokemones

####GET index http://localhost:8000/api/equipos_pokemones