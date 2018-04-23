using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace WebApplication1.Models
{
    public class Genre
    {
        public int GenreId { set; get; }
        [Required(ErrorMessage = "Name is required!")]
        [StringLength(100, ErrorMessage = "Maximal length of the name of a song is 100 characters!")]
        public String Name { set; get; }
        public ICollection<Song> Songs { set; get; }
        public Genre(int GenreId, String Name)
        {
            this.GenreId = GenreId;
            this.Name = Name;
        }
        public Genre() { }
    }
}