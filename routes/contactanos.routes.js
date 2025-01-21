const express = require("express");
const { saveContact, getContacts, deleteContact, updateContactStatus } = require("../controllers/contactanos.controller");

const router = express.Router();

//Autenticador de token, dato que ingresa del header = (Authorization: [token generado por el login])
const authMiddle = require("../middlewares/jwt.middleware")

// Ruta para guardar contacto
router.post("/contacts", authMiddle ,saveContact);

// Ruta para obtener contactos con paginación
router.get("/contacts", authMiddle ,getContacts);

// Ruta para eliminar un contacto por ID
router.delete("/contacts/:id", authMiddle ,deleteContact);

// Ruta para actualizar el estado de un contacto (de 0 a 1)
router.patch("/contacts/:id", authMiddle ,updateContactStatus);

module.exports = router;
