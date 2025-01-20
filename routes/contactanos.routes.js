const express = require("express");
const { saveContact } = require("../controllers/contactanos.controller");

const router = express.Router();

// Ruta para guardar contacto
router.post("/contact", saveContact);

module.exports = router;
