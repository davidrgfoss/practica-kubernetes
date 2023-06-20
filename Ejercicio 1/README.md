# Ejercicio 1 de la practica de kubernete, despliegue con minikube

* Sera necesario tener instalado minikube y kubectl, ambos se pueden instalar desde repositorio o desde su web oficial de forma sencilla

* Lanzamos la maquina, podemos escoger que metodo de lanzamiento queremos con "--driver=" por si queremos que se configure con "kvm2,virtualbox...". En mi caso dejare que se configure por defecto usando docker con el comando:

```
minikube start
```

* Lanzamos todos los ficheros yaml para que se configure la app con:

```
kubectl apply -f .
```

* Por ultimo activamos el plugin ingress con el comando:

```
minikube addons enable ingress
```

* Podemos obtener la ip de la maquina con el comando "minikube ip" y asi configurar el hosts.