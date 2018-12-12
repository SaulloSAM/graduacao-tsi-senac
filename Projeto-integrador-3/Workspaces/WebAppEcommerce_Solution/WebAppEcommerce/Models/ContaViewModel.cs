using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace WebAppEcommerce.Models
{
    [NotMapped]
    public class ContaViewModel
    {
        public virtual int idCliente { get; set; }

        public virtual string nomeClienteCompleto { get; set; }

        [Required(ErrorMessage = "E-mail é obrigatório")]
        [StringLength(100, MinimumLength = 5)]
        [EmailAddress(ErrorMessage = "E-mail inválido")]
        [DisplayName("E-mail")]
        public virtual string emailCliente { get; set; }

        [Required(ErrorMessage = "Senha é obrigatória")]
        [DataType(DataType.Password)]
        [DisplayName("Senha")]
        public virtual string senhaCliente { get; set; }
    }
}