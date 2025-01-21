const express = require("express")
const app = express()

const controller = require("../controllers/modalbranding.controller")

//Autenticador de token, dato que ingresa del header = (Authorization: [token generado por el login])
const authMiddle = require("../middlewares/jwt.middleware")

//Api para mandar toda la informacion de tipo GET con paginación de 20 en 20
//Api para guardar información en el backend ( Nombre, Email, numero )
//Api para eliminar un registro dependiendo del iD ue llegue del frontend por query

app.get("/", authMiddle , controller.get)

// Ruta POST para guardar información
app.post("/", authMiddle , controller.create);

//Ruta DELETE para eliminar
app.delete("/", authMiddle , controller.delete);

module.exports = app