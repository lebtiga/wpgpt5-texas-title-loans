#!/bin/bash

# Script to set up Freepik MCP for Claude Desktop on Mac

CONFIG_DIR="$HOME/Library/Application Support/Claude"
CONFIG_FILE="$CONFIG_DIR/claude_desktop_config.json"

echo "Setting up Freepik MCP for Claude Desktop..."

# Create the directory if it doesn't exist
if [ ! -d "$CONFIG_DIR" ]; then
    echo "Creating Claude config directory..."
    mkdir -p "$CONFIG_DIR"
fi

# Check if config file exists
if [ -f "$CONFIG_FILE" ]; then
    echo "Backing up existing config to $CONFIG_FILE.backup"
    cp "$CONFIG_FILE" "$CONFIG_FILE.backup"
    
    # Check if it already has mcpServers
    if grep -q "mcpServers" "$CONFIG_FILE"; then
        echo "⚠️  Warning: mcpServers already exists in config."
        echo "Please manually add the Freepik configuration."
        echo "Opening the config file for you..."
        open "$CONFIG_FILE"
    else
        # Add Freepik MCP to existing config
        echo "Adding Freepik MCP to existing config..."
        # This is complex with JSON, so we'll create a new one
        cat > "$CONFIG_FILE" << 'EOF'
{
  "mcpServers": {
    "freepik": {
      "command": "npx",
      "args": [
        "-y",
        "mcp-remote",
        "https://api.freepik.com/mcp",
        "--header",
        "x-freepik-api-key:FPSX3e1fb9d75ed20336b070cae064f424ef"
      ]
    }
  }
}
EOF
    fi
else
    # Create new config file
    echo "Creating new Claude config file..."
    cat > "$CONFIG_FILE" << 'EOF'
{
  "mcpServers": {
    "freepik": {
      "command": "npx",
      "args": [
        "-y",
        "mcp-remote",
        "https://api.freepik.com/mcp",
        "--header",
        "x-freepik-api-key:FPSX3e1fb9d75ed20336b070cae064f424ef"
      ]
    }
  }
}
EOF
fi

echo "✅ Configuration saved to: $CONFIG_FILE"
echo ""
echo "Next steps:"
echo "1. Quit Claude Desktop app completely"
echo "2. Restart Claude Desktop"
echo "3. You should see 'freepik' in the MCP servers list"
echo ""
echo "Would you like to open the config file to verify? (y/n)"
read -r response

if [[ "$response" == "y" ]]; then
    open "$CONFIG_FILE"
fi

echo ""
echo "Would you like to open Claude Desktop now? (y/n)"
read -r response

if [[ "$response" == "y" ]]; then
    open -a "Claude"
fi

echo "Setup complete!"