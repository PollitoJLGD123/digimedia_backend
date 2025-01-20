const { PrismaClient } = require("@prisma/client");
const prisma = new PrismaClient();

// Guardar Contacto
const saveContact = async (req, res) => {
  const { nombre, email, numero, mensaje } = req.body;

  try {
    if (!nombre || !email || !numero || !mensaje) {
      return res.status(400).json({ error: "Todos los campos son obligatorios." });
    }

    const contact = await prisma.contact.create({
      data: { nombre, email, numero, mensaje },
    });

    res.status(201).json({ message: "Contacto guardado exitosamente.", contact });
  } catch (error) {
    console.error(error);
    res.status(500).json({ error: "Error al guardar el contacto." });
  }
};

// Listar Contactos con paginación
const getContacts = async (req, res) => {
  const { page = 1 } = req.query;
  const pageSize = 20;

  try {
    const contacts = await prisma.contact.findMany({
      skip: (page - 1) * pageSize,
      take: pageSize,
    });

    const totalContacts = await prisma.contact.count();
    const totalPages = Math.ceil(totalContacts / pageSize);

    res.status(200).json({
      data: contacts,
      pagination: {
        totalContacts,
        totalPages,
        currentPage: parseInt(page),
        pageSize,
      },
    });
  } catch (error) {
    console.error(error);
    res.status(500).json({ error: "Error al obtener los contactos." });
  }
};

// Eliminar Contacto por ID
const deleteContact = async (req, res) => {
  const { id } = req.params;  // Cambiado de req.query a req.params

  try {
    if (!id) {
      return res.status(400).json({ error: "El ID es obligatorio." });
    }

    const deletedContact = await prisma.contact.delete({
      where: { id: parseInt(id, 10) },
    });

    res.status(200).json({
      message: "Contacto eliminado exitosamente.",
      deletedContact,
    });
  } catch (error) {
    console.error(error);
    if (error.code === "P2025") {
      return res.status(404).json({ error: "No se encontró ningún contacto con ese ID." });
    }
    res.status(500).json({ error: "Error al eliminar el contacto." });
  }
};

// Actualizar Estado del Contacto (de 0 a 1)
const updateContactStatus = async (req, res) => {
  const { id } = req.params;
  const { estado } = req.body;

  if (![0, 1].includes(estado)) {
    return res.status(400).json({ error: "El estado debe ser 0 o 1." });
  }

  try {
    const updatedContact = await prisma.contact.update({
      where: { id: parseInt(id, 10) },
      data: { estado },
    });

    res.status(200).json({
      message: "Estado actualizado exitosamente.",
      updatedContact,
    });
  } catch (error) {
    console.error(error);
    res.status(500).json({ error: "Error al actualizar el estado." });
  }
};

module.exports = { saveContact, getContacts, deleteContact, updateContactStatus };
