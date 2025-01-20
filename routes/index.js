const express = require("express")
const app = express()

const contactanos = require("./contactanos.routes")
const libro_reclamaciones = require("./libroreclamacion.routes")
const modal_branding = require("./modalbranding.routes")
const modal_desing = require("./modaldesing.routes")
const modal_gestion = require("./modalgestion.routes")
const modal_marketing = require("./modalmarketing.routes")
const posting_blog = require("./posting_blog.routes")
const usuarios = require("./usuarios.routes")


app.use("/contactanos", contactanos)
app.use("/libro-reclamaciones", libro_reclamaciones)
app.use("/modal-branding", modal_branding)
app.use("/modal-desing", modal_desing)
app.use("/modal-gestion", modal_gestion)
app.use("/modal-marketing", modal_marketing)
app.use("/posting_blog", posting_blog)
app.use("/usuarios", usuarios)


module.exports = app