using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace WebAppEcommerce.Controllers
{
    [Authorize] // Permite somente pessoas que estão autenticadas (Todos os métodos)
    public class CarrinhoController : Controller
    {
        [AllowAnonymous] // Permite pessoas que não estão autenticadas
        public ActionResult Index()
        {
            return View();
        }

        public ActionResult FecharPedido()
        {
            return View();
        }
    }
}