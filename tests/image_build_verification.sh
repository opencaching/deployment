#!/usr/bin/env bash

echo "This test will finish with zero code if all images can be build with success"

set -o errexit
set -o nounset
set -o pipefail

bash -c "cd database-image && ./build_me.sh"
