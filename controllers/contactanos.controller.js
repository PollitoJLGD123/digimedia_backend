const { PrismaClient } = require("@prisma/client");
const prisma = new PrismaClient();

const saveContact = async (req, res) => {
  const { nombre, email, numero, mensaje } = req.body;

  try {
    // Validaciones básicas
    if (!nombre || !email || !numero || !mensaje) {
      return res.status(400).json({ error: "Todos los campos son obligatorios." });
    }

    // Guarda el registro en la base de datos
    const contact = await prisma.contact.create({
      data: { nombre, email, numero, mensaje },
    });

    res.status(201).json({ message: "Contacto guardado exitosamente.", contact });
  } catch (error) {
    console.error(error);
    res.status(500).json({ error: "Error al guardar el contacto." });
  }
};

module.exports = { saveContact };
