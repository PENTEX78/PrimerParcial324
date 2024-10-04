using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace PrimerParcial
{
    public partial class FormAgregarPersona : Form
    {
        public FormAgregarPersona()
        {
            InitializeComponent();
        }

        private void label4_Click(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            string nombre = textBox1.Text;
            string apellido = textBox2.Text;
            string ci = textBox3.Text;
            string telefono = textBox4.Text;
            string correo = textBox5.Text;

            // Cadena de conexión a tu base de datos MySQL
            string connectionString = "Server=localhost;Port=3306;Database=bdnestor;Uid=root;Pwd=;";
            using (MySqlConnection conn = new MySqlConnection(connectionString))
            {
                try
                {
                    conn.Open();
                    string query = "INSERT INTO persona (nombre, apellido, ci, telefono, correo) VALUES (@nombre, @apellido, @ci, @telefono, @correo)";
                    using (MySqlCommand cmd = new MySqlCommand(query, conn))
                    {
                        cmd.Parameters.AddWithValue("@nombre", nombre);
                        cmd.Parameters.AddWithValue("@apellido", apellido);
                        cmd.Parameters.AddWithValue("@ci", ci);
                        cmd.Parameters.AddWithValue("@telefono", telefono);
                        cmd.Parameters.AddWithValue("@correo", correo);
                        cmd.ExecuteNonQuery();

                    }
                    MessageBox.Show("Persona agregada exitosamente.");
                    this.Close(); // Cerrar el formulario
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Error: " + ex.Message);
                }
            }
        }
    }
}
