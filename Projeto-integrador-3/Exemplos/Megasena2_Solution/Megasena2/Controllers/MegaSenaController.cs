using Megasena2.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Megasena2.Controllers
{
    public class MegaSenaController : Controller
    {
        // GET: MegaSena
        public ActionResult Index()
        {
            sorteio objM = new sorteio();
            ViewBag.Lista = objM.Sortear();
            return View();
        }
    }
}