//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated from a template.
//
//     Manual changes to this file may cause unexpected behavior in your application.
//     Manual changes to this file will be overwritten if the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

namespace WebAppEcommerce.Models
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;

    public partial class Cliente
    {
        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2214:DoNotCallOverridableMethodsInConstructors")]
        public Cliente()
        {
            this.Endereco = new HashSet<Endereco>();
            this.Pedido = new HashSet<Pedido>();
        }
    
        public int idCliente { get; set; }
        public string nomeCompletoCliente { get; set; }
        public string emailCliente { get; set; }
        public string senhaCliente { get; set; }
        public string CPFCliente { get; set; }
        public string celularCliente { get; set; }
        public string telComercialCliente { get; set; }
        public string telResidencialCliente { get; set; }
        public Nullable<System.DateTime> dtNascCliente { get; set; }
        public Nullable<bool> recebeNewsLetter { get; set; }
    
        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2227:CollectionPropertiesShouldBeReadOnly")]
        public virtual ICollection<Endereco> Endereco { get; set; }
        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2227:CollectionPropertiesShouldBeReadOnly")]
        public virtual ICollection<Pedido> Pedido { get; set; }
    }
}