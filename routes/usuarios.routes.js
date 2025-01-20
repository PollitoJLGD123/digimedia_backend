const express = require("express")
const app = express()

const controller = require("../controllers/usuarios.controller")


//Api para mandar toda la informacion de tipo GET con paginación de 20 en 20
app.get("/", controller.get)
//login
app.post("/login", controller.login)
//Api para guardar información en el backend ( Nombre, Usuario, Password, rol)
app.post("/", controller.create)
//avtualizar contraseña
app.put("/change-pass", controller.updatePassword)
//Api para actualizar información del backend ( Nombre, Usuario, rol)
app.put("/", controller.update)
//Api para eliminar un registro dependiendo del iD ue llegue del frontend por query
app.delete("/", controller.delete)


module.exports = app