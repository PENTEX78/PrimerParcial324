package servlets;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.BufferedReader;
import java.io.PrintWriter;
import org.json.JSONArray;
import java.io.OutputStream;
import org.json.JSONObject;
import java.net.HttpURLConnection;
import java.net.URL;


@WebServlet(name = "tipoImpuesto", urlPatterns = {"/tipoImpuesto"})
public class tipoImpuesto extends HttpServlet {
    
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
    }
    
    //funcion para recibir los datos enviados desde el otro servidor
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        String number = request.getParameter("codigoCatastro");
        
        String tipoImpuesto = clasificarPorNumero(number);
        
        String urlPHP = "http://localhost:8080/PrimerParcial324/mostrarTipoImpuesto.php?tipo=" + tipoImpuesto;
        response.sendRedirect(urlPHP);
    }


    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
    }

    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>
    
    public static String clasificarPorNumero(String cadena) {
        if (cadena == null || cadena.isEmpty()) {
            return "Cadena vacía o nula"; // Manejo de cadena vacía o nula
        }

        char primerCaracter = cadena.charAt(0); // Obtiene el primer carácter

        switch (primerCaracter) {
            case '1':
                return "ALTO";
            case '2':
                return "MEDIO";
            case '3':
                return "BAJO";
            default:
                return "Valor no válido"; // Manejo de caracteres que no son 1, 2 o 3
        }
    }
    
}
