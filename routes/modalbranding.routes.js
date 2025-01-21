const express = require("express")
const app = express()

const controller = require("../controllers/modalbranding.controller")

//Api para mandar toda la informacion de tipo GET con paginación de 20 en 20
//Api para guardar información en el backend ( Nombre, Email, numero )
//Api para eliminar un registro dependiendo del iD ue llegue del frontend por query

app.get("/", controller.get)

// Ruta POST para guardar información
app.post("/", controller.create);

module.exports = app