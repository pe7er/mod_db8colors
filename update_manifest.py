import os
import xml.etree.ElementTree as ET
from datetime import datetime

def load_env_variables(env_path='.env'):
    """Load environment variables from a .env file."""
    if os.path.exists(env_path):
        with open(env_path) as f:
            for line in f:
                if line.startswith('#') or '=' not in line:
                    continue
                key, value = line.strip().split('=', 1)
                os.environ[key] = value

def update_manifest(manifest_path):
    # Load environment variables, including VERSION from .env
    load_env_variables()

    # Get version from environment variables
    version = os.getenv('VERSION', '1.0.0')  # Default to '1.0.0' if not found

    # Define the current date
    current_date = datetime.now().strftime('%Y-%m-%d')

    # Load the XML file
    tree = ET.parse(manifest_path)
    root = tree.getroot()

    # Update the creationDate
    date_element = root.find('.//creationDate')
    if date_element is not None:
        date_element.text = current_date

    # Update the version
    version_element = root.find('.//version')
    if version_element is not None:
        version_element.text = version

    # Save the updated manifest
    tree.write(manifest_path)

if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Usage: update_manifest.py <manifest_path>")
        sys.exit(1)

    manifest_path = sys.argv[1]
    update_manifest(manifest_path)
