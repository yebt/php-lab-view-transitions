import os

def rename_images(folder_path, prefix="p"):
    """
    Renombra de forma secuencial todas las imágenes en una carpeta.

    Args:
        folder_path (str): Ruta de la carpeta que contiene las imágenes.
        prefix (str): Prefijo para los nombres de las imágenes (por defecto: "p").
    """
    # Lista de extensiones de imagen comunes
    valid_extensions = {".png", ".jpg", ".jpeg", ".gif", ".bmp", ".tiff"}

    try:
        # Obtener la lista de archivos en la carpeta
        files = os.listdir(folder_path)
        
        # Filtrar y ordenar archivos que son imágenes
        images = [f for f in files if os.path.splitext(f)[1].lower() in valid_extensions]
        images.sort()

        # Renombrar imágenes secuencialmente
        for index, image in enumerate(images, start=1):
            ext = os.path.splitext(image)[1]
            new_name = f"{prefix}{index}{ext}"
            old_path = os.path.join(folder_path, image)
            new_path = os.path.join(folder_path, new_name)
            os.rename(old_path, new_path)
            print(f"Renombrado: {image} -> {new_name}")

        print("\nRenombrado completado.")

    except Exception as e:
        print(f"Error: {e}")

# Ruta de la carpeta donde están las imágenes
folder_path = input("Ingresa la ruta de la carpeta con las imágenes: ")
rename_images(folder_path, "product")
