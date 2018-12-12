using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(Megasena2.Startup))]
namespace Megasena2
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
