using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using WebAppEcommerce.Models;

namespace WebAppEcommerce.Controllers
{
    public class CategoriaController : Controller
    {
        // GET: Categoria
        public ActionResult Menu()
        {
            Entidades db = new Entidades();
            // faz a listagem da lista ordenando por nome.
            var lista = db.Categoria.Where(m => m.nomeCategoria != null).OrderBy(m => m.nomeCategoria).ToList();
            return PartialView(lista);
        }
    }
}