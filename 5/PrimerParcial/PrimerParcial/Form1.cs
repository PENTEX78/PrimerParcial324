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
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            CargarDatos();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            FormAgregarPersona agregarPersonaForm = new FormAgregarPersona();
            agregarPersonaForm.ShowDialog(); // Muestra el formulario como un diálogo
            CargarDatos(); // Llama a un método para recargar los datos en el DataGridView
        }

        private void CargarDatos()
        {
            // Cadena de conexión a tu base de datos MySQL
            string connectionString = "Server=localhost;Port=3306;Database=bdnestor;Uid=root;Pwd=;";

            // Consulta SQL que deseas ejecutar
            string query = "SELECT * FROM persona";  // Cambia tu_tabla por el nombre real de tu tabla

            // Crear una conexión a la base de datos MySQL
            using (MySqlConnection conn = new MySqlConnection(connectionString))
            {
                try
                {
                    // Abrir la conexión
                    conn.Open();

                    // Crear un adaptador de datos MySQL con la consulta SQL
                    MySqlDataAdapter dataAdapter = new MySqlDataAdapter(query, conn);

                    // Crear un DataTable para almacenar los resultados
                    DataTable dataTable = new DataTable();

                    // Llenar el DataTable con los resultados de la consulta
                    dataAdapter.Fill(dataTable);

                    // Asignar el DataTable como fuente de datos del DataGridView
                    dataGridView1.DataSource = dataTable;
                }
                catch (Exception ex)
                {
                    // Mostrar un mensaje de error si algo falla
                    MessageBox.Show("Error: " + ex.Message);
                }
            }
        }
    }
}
