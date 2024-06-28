import docker
import os
import sys

# Initialize Docker client
client = None

def check_docker_installation():
    global client
    try:
        client = docker.from_env()
        client.ping()
        print("Docker est installé et fonctionne correctement.")
    except docker.errors.DockerException:
        print("Docker n'est pas installé ou le service Docker ne fonctionne pas.")
        sys.exit(1)

def get_container_details():
    containers = []
    num_containers = int(input("Combien de conteneurs voulez-vous créer ? "))

    for i in range(num_containers):
        name = input(f"Entrez le nom pour le conteneur {i + 1}: ")
        bind_ports = {10050: 10050}

        expose_additional_ports = input("Voulez-vous exposer des ports supplémentaires ? (oui/non): ").strip().lower()
        if expose_additional_ports == 'oui':
            while True:
                additional_port = int(input("Entrez le port à exposer: "))
                bind_ports[additional_port] = additional_port
                more_ports = input("Voulez-vous ajouter un autre port ? (oui/non): ").strip().lower()
                if more_ports != 'oui':
                    break

        containers.append({'name': name, 'ports': bind_ports})

    return containers

def build_image():
    # Build the Docker image using the Dockerfile in the current directory
    print("Construction de l'image Docker...")
    image, logs = client.images.build(path=".")
    for log in logs:
        print(log.get('stream', ''), end='')
    return image

def create_containers(containers, image):
    for container in containers:
        name = container['name']
        ports = container['ports']

        print(f"Création du conteneur {name} avec les ports {ports}...")
        client.containers.run(
            image.id,
            name=name,
            ports=ports,
            detach=True
        )
        print(f"Conteneur {name} créé avec succès.")

def main():
    if not os.path.isfile("Dockerfile"):
        print("Le fichier Dockerfile est introuvable dans le répertoire courant.")
        return

    check_docker_installation()
    containers = get_container_details()
    image = build_image()
    create_containers(containers, image)

if __name__ == "__main__":
    main()