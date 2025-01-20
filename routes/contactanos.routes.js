const express = require("express");
const { saveContact, getContacts, deleteContact, updateContactStatus } = require("../controllers/contactanos.controller");

const router = express.Router();

// Ruta para guardar contacto
router.post("/contacts", saveContact);

// Ruta para obtener contactos con paginación
router.get("/contacts", getContacts);

// Ruta para eliminar un contacto por ID
router.delete("/contacts/:id", deleteContact);

// Ruta para actualizar el estado de un contacto (de 0 a 1)
router.patch("/contacts/:id", updateContactStatus);

module.exports = router;
