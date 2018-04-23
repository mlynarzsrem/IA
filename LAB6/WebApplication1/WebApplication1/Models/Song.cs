using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace WebApplication1.Models{
    public class Song{
        [Required(ErrorMessage = "Name is required!")]
        [StringLength(100, ErrorMessage = "Maximal length of the name of a song is 100 characters!")]
        public string Name { get; set; }
        [Required(ErrorMessage = "Artist name is required!")]
        [StringLength(100, ErrorMessage = "Maximal length of the artist name of a song is 100 characters!")]
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
