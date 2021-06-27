$(function () {
  $('#logout-btn').dxButton({
    stylingMode: 'contained',
    text: 'logout',
    type: 'danger',
    width: 120,
    onClick: function () {
      window.location.href = `/logout.php`
    }
  })

  $('#add-note-btn').dxButton({
    icon: 'plus',
    text: 'add note',
    onClick: function (e) {
      popup.show()
    }
  })

  const handleAddNote = function (event) {
    event.preventDefault()
    event.target[0].value
    fetch('/api/note/create.php', {
      method: 'POST',
      body: JSON.stringify({
        title: event.target[0].value,
        content: '<p>empty note</p>'
      })
    })
      .then((response) => {
        DevExpress.ui.notify({
          message: 'added note successfully',
          type: 'success',
          displayTime: 3000,
          width: 300
        })
        showNotes()
        popup.hide()
      })
      .catch((error) => {
        DevExpress.ui.notify({
          message: "couldn't add note",
          type: 'error',
          displayTime: 3000,
          height: 100,
          width: 300
        })
        console.log(error)
      })
  }

  const popup = $('#add-note-popup')
    .dxPopup({
      width: 500,
      height: 350,
      showTitle: true,
      title: 'Add Note',
      closeOnOutsideClick: true,
      contentTemplate: () => {
        const content = $("<form method='post' />")
        content.submit(handleAddNote)
        content.dxForm({
          colCount: 1,
          items: [
            {
              dataField: 'Note title',
              validationRules: [
                {
                  type: 'required',
                  message: 'please enter note title'
                }
              ]
            },
            {
              itemType: 'button',
              horizontalAlignment: 'right',
              buttonOptions: {
                text: 'Add Note',
                type: 'success',
                useSubmitBehavior: true
              }
            }
          ]
        })

        return content
      }
    })
    .dxPopup('instance')

  const showNotes = function () {
    fetch('/api/note/read.php')
      .then((response) => response.json())
      .then((data) => {
        $('.notes-grid').empty()
        $('.empty-center').remove()
        renderNotes(data)
      })
      .catch((error) => {
        DevExpress.ui.notify({
          message: 'Connection problem',
          type: 'error',
          displayTime: 3000,
          width: 300
        })
        console.log(error)
      })
  }

  const renderNotes = function (data) {
    $.each(data, function (key, val) {
      let tmp = document.createElement('DIV')
      tmp.innerHTML = val.content
      const stringContent = tmp.textContent || tmp.innerText || ''

      const note_card_html = `<div class="note-card" data-id=${val.id}>
            <div class="note-header-wrapper">
                <h3>${val.title}</h3>
                <button class="note-delete-btn" data-id=${
                  val.id
                }><i class="fa fa-trash"></i></button>
            </div>
            last Updated: ${luxon.DateTime.fromSQL(val.updated_at).toRelative()}
            <div class="note-card-content">${stringContent}</div>
        </div>`

      $('.notes-grid').append(note_card_html)
    })

    if (Array.isArray(data) && data.length === 0) {
      const emptyHtml = `<div class="empty-center">
        <div class="empty-container">
            <div class="empty-wrapper">
                <img src="./assets/empty-notes.svg" height="200" width="200" alt="empty" />
                <h3>Empty notes</h3>
                <p>Press the add button on top right to add note</p>
            </div>
        </div>
    </div>`
      $('.padded-notes-area').append(emptyHtml)
    }

    $(document).off('click', '.note-card', editNote)
    $(document).on('click', '.note-card', editNote)

    $(document).off('click', '.note-delete-btn', handleNoteDelete)
    $(document).on('click', '.note-delete-btn', handleNoteDelete)
  }

  const handleNoteDelete = function (event) {
    event.stopPropagation()
    const id = $(this).attr('data-id')

    fetch('/api/note/delete.php', {
      method: 'DELETE',
      body: JSON.stringify({ id: id })
    })
      .then((res) => {
        DevExpress.ui.notify({
          message: 'Succesfully deleted note',
          type: 'success',
          displayTime: 3000,
          width: 300
        })
        showNotes()
      })
      .catch((error) => {
        DevExpress.ui.notify({
          message: 'Connection problem',
          type: 'error',
          displayTime: 3000,
          width: 300
        })
        console.log(error)
      })
  }

  const editNote = function () {
    const id = $(this).attr('data-id')
    window.location.href = `/edit.php?id=${id}`
  }

  showNotes()
})
