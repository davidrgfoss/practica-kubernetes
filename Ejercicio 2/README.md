# Ejercicio 2: Despliegue de la app bookmedik con otra distribución diferente a minikube.

* Para este ejercicio he escogido usar kind, ya que kubeadm no tiene version oficial para opensuse. Se puede instalar de forma sencilla siguiendo la documentacion oficial, tambien es necesario tener instalado kubectl.

* He dejado un fichero llamado kind.yaml que contiene el cluster que voy a utilizar, se compone del nodo principal y 3 nodos worker.

* Ejecutamos el siguiente comando para levantar los nodos:

```
kind create cluster --name kubernetes-p2 --config kind.yaml
```

* Ejecutamos los siguientes comandos para levantar toda la configuración que ya hemos utilizado en el apartado 1 y nos permitira usar la app bookmedik:

```
# Aplicamos todos los ficheros del directorio actual, no hay problema con que un fichero dependa de otro. Kubernetes de forma automatica sabe gestionar el lanzamiento y esperar o reintentar en caso de que uno dependa de otro. Por ultimo en mi imagen usada tengo configurado un script de comprobación con mariadb.
kubectl apply -f .

# Configuramos el controlador ingress-nginx que nos permitira acceder con una URL como hicimos con minikube
kubectl apply -f https://raw.githubusercontent.com/kubernetes/ingress-nginx/main/deploy/static/provider/kind/deploy.yaml
```

* Miramos la dirección ip del nodo control del cluster creado con kind, para poder configurarlo en nuestro host y acceder a la web:

```
docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' kubernetes-p2-control-plane
```

