
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
namespace WebApplication1.Models{
    public class MusicDbContext : System.Data.Entity.DbContext
    {
        public System.Data.Entity.DbSet<Song> Songs { get; set; }
        public MusicDbContext() : base("DefaultConnection") {
        }

        public System.Data.Entity.DbSet<WebApplication1.Models.Genre> Genres { get; set; }
    }
}
