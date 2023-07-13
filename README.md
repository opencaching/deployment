# Opencaching deployment toolkit

### Building devel virtualbox image
Requirements:
* hashicorp packer >= 1.9
* virtualbox >= 7.0

Invoke command:
```
packer build oc-devel.vbox.json
```

### Deploying opencaching node on existing Ubuntu instance
Prerequisites:
* Only ubuntu OS is supported.
* You need to have working ubuntu machine with SSH connectivity already configured (by SSH keys) and password-less sudo on user used for deployment.
* This ansible playbook do not guarantee security and probably many others stuff needs to be configured manually later.
This tool is mostly used to deploy development environments but with some tweaks in the future can be used to deploy production ready opencaching nodes.
* You have been warned if you deploying opencaching node on production by this ansible script. Don't do that.

Requirements:
* python3 & ansible (check requirements.txt)

## Running playbook (remote)
1. Update IP address of your future OC node in deployer/inventory/remote.inventory
2. Perform commands:
(switch `user` to correct username on your machine)
```
cd deployer
ansible-playbook oc.yml -i inventory/remote.inventory -u user --become
```
