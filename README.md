# Drush performance test

Check the [presentation](drush-perf.odp).

Requires [DDEV](https://ddev.readthedocs.io/en/stable/).

Start Drupal site and generate dummy content: `ddev start`.

Compiling the Rust binary is a bit more complicated, on Ubuntu 22.04 x86_64:

```
sudo apt install musl-tools
rustup target add x86_64-unknown-linux-musl
cd rust
cargo build --release --target x86_64-unknown-linux-musl
cd ..
cp rust/target/x86_64-unknown-linux-musl/release/droprabbit .
```

We use `musl` to get a portable binary that will also run in DDEV independent of
glibc.

Run benchmark: `ddev exec ./benchmark.sh`
