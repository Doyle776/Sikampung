<div class="modal fade" id="confirmationDelete-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
              <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close" >
                <i class="fas fa-times" ></i>
              </button>
          </div>
          <div class="modal-body">
              Apakah Anda yakin ingin menghapus data penduduk dengan nama <strong>{{ $item->name }}</strong>?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <form action="{{ route('resident.destroy', $item->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-outline-danger">Hapus</button>
              </form>
          </div>
      </div>
  </div>
</div>
