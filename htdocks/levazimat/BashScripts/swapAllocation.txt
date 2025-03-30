#!/bin/bash

# Variables
SWAPFILE=/swapfile
SWAPSIZE=2G  # Adjust swap size as needed

# Check if swap file already exists
if [ -f "$SWAPFILE" ]; then
  echo "Swap file already exists at $SWAPFILE."
  exit 0
fi

# Create a swap file
echo "Creating a swap file of size $SWAPSIZE..."
fallocate -l $SWAPSIZE $SWAPFILE || dd if=/dev/zero of=$SWAPFILE bs=1M count=$(echo "$SWAPSIZE" | sed 's/G/*1024/;s/M//;s/K//;s/B//')

# Set the correct permissions
chmod 600 $SWAPFILE

# Set up the swap area
mkswap $SWAPFILE

# Enable the swap
swapon $SWAPFILE

# Make swap permanent
if ! grep -q "$SWAPFILE" /etc/fstab; then
  echo "$SWAPFILE none swap sw 0 0" >> /etc/fstab
fi

echo "Swap area of size $SWAPSIZE created and enabled."
