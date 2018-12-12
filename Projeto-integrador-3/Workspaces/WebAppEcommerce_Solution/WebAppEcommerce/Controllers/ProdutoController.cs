using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using WebAppEcommerce.Models;

namespace WebAppEcommerce.Controllers
{
    public class ProdutoController : Controller
    {
        private Entidades db = new Entidades();

        // GET: Produto

        public ActionResult Lista(int? id, string nome = "")
        {
            // Passamos o nome da Categoria, na página Web.            
            ViewBag.Categoria = nome;

            // Criar lista de produtos, referente a categoria.
            var lista = db.Produto.Where(p => p.idCategoria == id && p.ativoProduto == "1").ToList();
            return View(lista);
        }
        /*
        public ActionResult Lista(int id = 0)
        {
            if (id == -1)
            {
                ViewBag.Mensagem = "Todas os produtos das demais categorias...";
                return View(db.Categoria.Where(p => p.idCategoria > 5).
                    OrderBy(o => o.idCategoria).ToList());
            }
            if (db.Categoria.Where(p => p.idCategoria == id).Count() > 0)
            {
                ViewBag.Mensagem = db.Categoria.Find(id).nomeCategoria.ToString();
                return View(db.Produto.Where(p => p.idCategoria == id).ToList());
            }
            else
            {
                return View(db.Produto.ToList());
            }
        }*/

        public ActionResult Novidades ()
        {
            var novidades = db.Produto.OrderByDescending(x => x.idProduto).Take(4);
            return PartialView(novidades);
        }

        public ActionResult Promocao()
        {
            var promocao = db.Produto.Where(x => x.descontoPromocao != 0).Take(4);
            return PartialView(promocao);
        }

        public ActionResult Pesquisar(string valor)
        {

            var lista = db.Produto.Where(p => p.nomeProduto.Contains(valor) || p.descProduto.Contains(valor)).ToList();

            if (lista.Count != 0) ViewBag.Categoria = "Resultado da pesquisa";
            else ViewBag.Categoria = "Produto Não Encontrado";

            return View("Lista",lista);
        }

        public ActionResult Destaque()
        {
            // Define um numero Randomico -> "Guid.NewGuid()". --> Pegar o primeiro num aleatório ".FirstOrDefault()".
            var produto = db.Produto.Where(m => m.ativoProduto == "1" && m.imagem != null).OrderBy(random => Guid.NewGuid()).FirstOrDefault();
            return PartialView(produto);
        }

        public ActionResult Detalhes(int? id)
        {
            var produto = db.Produto.Where
                (m => m.idProduto == id).FirstOrDefault();
            return View(produto);
        }

        [HttpPost]
        public JsonResult Carrinho(string cart)
        {
            List<ItemCarrinho> cartList = new List<ItemCarrinho>();

            if (cart != null)
            {
                var produtos = JsonConvert.DeserializeObject<List<ItemCarrinho>>(cart);

                foreach (var produto in produtos)
                {
                    var qtd = int.Parse(produto.productQtd.ToString());
                    if (qtd > 0)
                    {
                        var idProduto = int.Parse(produto.productId.ToString());
                        var resultado = db.Produto.Where(m => m.idProduto == idProduto).FirstOrDefault();
                        ItemCarrinho prod = new ItemCarrinho();
                        prod.productId = idProduto;
                        prod.productQtd = qtd;
                        prod.productName = resultado.nomeProduto;
                        resultado.descontoPromocao = resultado.descontoPromocao == null ? 0 : resultado.descontoPromocao;
                        prod.productPrice = resultado.precProduto - (decimal)resultado.descontoPromocao;
                        prod.productTotal = qtd * prod.productPrice;
                        string imgProduct = string.Empty;
                        if (resultado.imagem != null)
                        {
                            string base64String = Convert.ToBase64String(resultado.imagem);
                            imgProduct = "data:image/png;base64," + base64String;
                        }
                        else
                        {
                            imgProduct = "~/img/default_product.png";
                        }
                        prod.productImage = imgProduct;
                        cartList.Add(prod);
                    }
                }
                Session["Carrinho"] = cartList;
            }
            return Json(JsonConvert.SerializeObject(cartList));
        }

        public ActionResult Carrinho()
        {
            ViewBag.IsCartPage = true;
            return View();
        }

    }
}