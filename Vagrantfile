Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"
  config.vm.network "private_network", ip: "192.168.42.24"

  config.vm.provision "shell" do |s|
    ssh_pub_key = File.readlines("#{Dir.home}/.ssh/id_rsa.pub").first.strip
    s.inline = <<-SHELL
        echo #{ssh_pub_key} < /home/vagrant/.ssh/authorized_keys
        echo #{ssh_pub_key} < /root/.ssh/authorized_keys
        sudo apt-get install -y python
    SHELL
  end

  config.vm.provider "virtualbox" do |v|
    v.memory = 2048
    v.cpus = 1
  end

  config.vm.provision "ansible_local" do |ansible|
    ansible.playbook = "install.yml"

  end

  config.vm.provision "ansible_local" do |ansible|
    ansible.playbook = "playbook.yml"
    ansible.inventory_path = "hosts"
    ansible.verbose = true
    ansible.install = true
    ansible.install_mode = "pip"
    ansible.version = "2.2.1.0"
  end
end