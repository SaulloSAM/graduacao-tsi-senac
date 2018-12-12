using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Megasena2.Models
{
    public class sorteio
    {
        public List<int> Sortear(int intQtd = 6)
        {
            // Criamos um método que retorne uma lista de inteiros, com o valor setado no 6, porem podendo ser alterado pelo usuário.
            Random r = new Random();

            List<int> lista = new List<int>();

            for (int i = 0; i < intQtd; i++)
            {
                int iSort = r.Next(1, 60);

                for (int j = 0; j  < lista.Count; j ++)
                {
                    if(lista[j] == iSort)
                    {
                        i = i - 1;
                    }else
                    {
                        lista.Add();
                    }
                }               
            }
            return lista;
        }
    }
}