using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(WebAppEcommerce.Startup))]
namespace WebAppEcommerce
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
