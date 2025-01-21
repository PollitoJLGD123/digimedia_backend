const express = require("express")
const app = express()

const controller = require("../controllers/usuarios.controller")

//Autenticador de token, dato que ingresa del header = (Authorization: [token generado por el login])
const authMiddle = require("../middlewares/jwt.middleware")

//Api para mandar toda la informacion de tipo GET con paginación de 20 en 20
app.get("/", authMiddle ,controller.get)

//login
app.post("/login", controller.login)

//Api para guardar información en el backend ( Nombre, Usuario, Password, rol)
app.post("/", controller.create)

//avtualizar contraseña
app.put("/change-pass/:id", authMiddle ,controller.updatePassword)

//Api para actualizar información del backend ( Nombre, Usuario, rol)
app.put("/:id", authMiddle ,controller.update)

//Api para eliminar un registro dependiendo del iD ue llegue del frontend por query
app.delete("/:id", authMiddle ,controller.delete)


module.exports = app