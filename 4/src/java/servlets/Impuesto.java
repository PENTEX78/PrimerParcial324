package servlets;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet(name = "Impuesto", urlPatterns = {"/Impuesto"})
public class Impuesto extends HttpServlet {

    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
      
    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        String codigoCatastral = request.getParameter("codigo_catastral");
        String tipoImpuesto = clasificarPorNumero(codigoCatastral); // Tu lógica para clasificar
        
        System.out.println(codigoCatastral);

        // Devolver la respuesta como texto
        response.setContentType("text/plain");
        PrintWriter out = response.getWriter();
        out.print(tipoImpuesto);
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    @Override
    public String getServletInfo() {
        return "Short description";
    }
    
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
