
source "virtualbox-iso" "oc_devel" {
  boot_command           = ["<tab><tab><tab><tab><tab><tab><tab><tab><tab><tab><wait>",
                            "<tab><tab><tab><tab><tab><tab><tab><tab><tab><tab><wait>",
                            "<tab><tab><tab><tab><tab><tab><tab><tab><tab><tab><wait>",
                            "<tab><tab><tab><tab><tab><tab><tab><tab><tab><tab><wait>",
                            "<tab><tab><tab><tab><tab><tab><tab><tab><tab><tab><wait>",
                            "<tab><tab><tab><tab><tab><tab><tab><tab><tab><tab><wait>",
                            "<tab><tab><tab><tab><tab><tab><tab><tab><tab><tab><wait>",
                            "<tab><tab><tab><tab><tab><tab><tab><tab><tab><tab><wait>",
                            "<tab><tab><tab><tab><tab><tab><tab><tab><tab><tab><wait>",
                            "<tab><tab><tab><tab><tab><tab><tab><tab><tab><tab><wait>",
                            "c<wait>",
                            "set gfxpayload=keep<enter><wait>",
                            "linux /casper/vmlinuz <wait>",
                            "autoinstall quiet fsck.mode=skip <wait>",
                            "net.ifnames=0 biosdevname=0 systemd.unified_cgroup_hierarchy=0 <wait>",
                            "ds=\"nocloud-net;s=http://{{ .HTTPIP }}:{{ .HTTPPort }}/\" <wait>",
                            "---<enter><wait>",
                            "initrd /casper/initrd<enter><wait>",
                            "boot<enter>"]
  boot_wait              = "1s"
  cpus                   = 2
  disk_size              = 65536
  guest_os_type          = "Ubuntu_64"
  headless               = false
  http_directory         = "./autoinstall/http"
  iso_checksum           = "5e38b55d57d94ff029719342357325ed3bda38fa80054f9330dc789cd2d43931"
  iso_url                = "http://releases.ubuntu.com/22.04.2/ubuntu-22.04.2-live-server-amd64.iso"
  memory                 = 4096
  shutdown_command       = "sudo shutdown -h now"
  ssh_password           = "ubuntu"
  ssh_port               = 22
  ssh_read_write_timeout = "600s"
  ssh_timeout            = "30m"
  ssh_username           = "user"
  vm_name                = "oc_devel"
  vboxmanage             = [
                            ["modifyvm", "{{ .Name }}", "--cpu-profile", "host"],
                            ["modifyvm", "{{ .Name }}", "--nat-localhostreachable1", "on"]
                           ]
}

build {
  sources = ["source.virtualbox-iso.oc_devel"]

  provisioner "ansible-local" {
    inventory_file = "./deployer/inventory/local.inventory"
    playbook_dir   = "./deployer"
    playbook_file  = "./deployer/oc.yml"
  }

  post-processor "vagrant" {
    keep_input_artifact = true
    compression_level   = 9
    provider_override   = "virtualbox"
  }
}
