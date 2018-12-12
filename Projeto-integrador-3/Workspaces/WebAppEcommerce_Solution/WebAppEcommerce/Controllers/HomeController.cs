using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using WebAppEcommerce.Models;

namespace WebAppEcommerce.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult Index()
        {
            Entidades db = new Entidades();
            var lista = db.Produto.
                Where(m => m.precProduto > 0).
                Take(3).ToList();
            return View(lista);
        }

        [Authorize]
        public ActionResult Sobre()
        {
            return View();
        }

        public ActionResult Contato()
        {
            return View();
        }
    }
}