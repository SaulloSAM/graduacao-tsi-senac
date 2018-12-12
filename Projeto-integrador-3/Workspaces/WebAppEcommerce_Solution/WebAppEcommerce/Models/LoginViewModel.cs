using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace WebAppEcommerce.Models
{
    [NotMapped]
    public class LoginViewModel
    {              
        [Required]
        [DataType(DataType.EmailAddress)]
        public string Email { get; set; }

        [Required]
        [Display(Name="Senha")]
        [DataType(DataType.Password)]
        public string Password { get; set; }   
    }
}