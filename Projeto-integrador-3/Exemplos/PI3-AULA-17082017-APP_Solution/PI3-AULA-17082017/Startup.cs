using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(PI3_AULA_17082017.Startup))]
namespace PI3_AULA_17082017
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
