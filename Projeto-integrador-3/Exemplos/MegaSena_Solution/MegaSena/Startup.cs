using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(MegaSena.Startup))]
namespace MegaSena
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
