using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace WebAppEcommerce.Models
{
    [NotMapped] // Não está mapeada em nenhuma entidade.
    public class ClienteViewModel
    {
        // [Riquired] == Diz que o campo é obrigatório.
        // Campos Obrigatórios [ idCliente, nomeCompletoCliente, emailCliente, senhaCliente, CPF]

        public int idCliente { get; set; }

        [Required]
        [Display(Name = "Nome Completo")]
        public string nomeCompletoCliente { get; set; }

        [Required]
        [Display(Name = "Data de Nascimento")]
        public string dataNascimento { get; set; }

        [Required]
        [Display(Name = "E-mail")]
        [Remote("VerificarEmail", "Conta")]
        [DataType(DataType.EmailAddress)]
        public string emailCliente { get; set; }

        [Required]
        [Display(Name = "Senha")]
        [DataType(DataType.Password)]
        public string senhaCliente { get; set; }

        [Required]
        [Display(Name = "Confirmar de Senha")]
        [DataType(DataType.Password)]
        [System.ComponentModel.DataAnnotations.Compare("senhaCliente", ErrorMessage = "Senha e Confirmação não são iguais.")]
        public string senhaConfirmaCliente { get; set; }

        [Required]
        [Display(Name = "CPF")]
        [Remote("VerificarCPF", "Conta")] // Passa o nome de uma ação e uma controller.
        [MinLength(11, ErrorMessage = "Minimo de  11 Dígitos")]
        [MaxLength(11, ErrorMessage = "Máximo de 11 Dígitos")]
        public string CPFCliente { get; set; }

    }
}