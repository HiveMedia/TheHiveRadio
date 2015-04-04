# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  # Point to our box
  config.vm.box = "Hive/Laravel"
  config.vm.hostname = "dev.hiveradio.net"

  # Update Local Hosts File
  if Vagrant.has_plugin?("hostsupdater")
    config.hostsupdater.aliases = ["dev.hiveradio.net", "admin.dev.hiveradio.net"]
  end

  # Network Config
  config.vm.network "private_network", ip: "192.168.33.99"

  # Map Stuff
  config.vm.synced_folder ".", "/var/www/html", :owner=> 'nginx', :group=>'nginx', :mount_options => ['dmode=777', 'fmode=666']

  # Useful stuff
  config.vm.post_up_message = "
  Useful Stuff like, http://dev.hiveradio.net/
  You will need to run a composor update"

end
