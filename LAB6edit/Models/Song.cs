using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace WebApplication1.Models{
    public class Song{
        public string Name { get; set; }
        public string Artist { get; set; }
        public string Genre { get; set; }
        public int Id { get; set; }
        public Song(string Name, string Artist, string Genre, int Id) {
            this.Name = Name;
            this.Artist = Artist;
            this.Genre = Genre;
            this.Id = Id;
        }
        public Song() {
        }
    }
}
