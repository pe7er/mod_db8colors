import sys
import xml.etree.ElementTree as ET
from datetime import datetime

def update_manifest(extension, manifest, version):
    print(f"Extension: {extension}, Manifest: {manifest}, Version: {version}")
    # Rest of your code...

def update_manifest(extension, manifest, version):
    # Define the current date and year
    current_date = datetime.now().strftime('%Y-%m-%d')
    current_year = datetime.now().year

    # Construct the path to the manifest file
    manifest_path = f"{extension}/{manifest}"
    tree = ET.parse(manifest_path)
    root = tree.getroot()

    # Update the creationDate
    date_element = root.find('.//creationDate')
    if date_element is not None:
        date_element.text = date_element.text.replace('{{date}}', current_date)

    # Update the version
    version_element = root.find('.//version')
    if version_element is not None:
        version_element.text = version_element.text.replace('{{version}}', version)

    # Update the copyright
    copyright_element = root.find('.//copyright')
    if copyright_element is not None:
        copyright_text = copyright_element.text.replace('{{year}}', str(current_year))
        copyright_element.text = copyright_text

    # Save the updated manifest
    tree.write(manifest_path)

if __name__ == "__main__":
    if len(sys.argv) != 4:
        print("Usage: update_manifest.py <extension> <manifest> <version>")
        sys.exit(1)

    extension, manifest, version = sys.argv[1], sys.argv[2], sys.argv[3]
    update_manifest(extension, manifest, version)
