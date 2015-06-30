Vagrant.configure(2) do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.network "private_network", ip: "192.168.33.10"
  config.vm.synced_folder ".", "/vagrant", id: "vagrant-root", owner: "vagrant", group: "www-data", mount_options: ["dmode=775,fmode=664"]
  config.vm.provision "shell", path: "bootstrap.sh"
end
