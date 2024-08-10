import Card from "@/Components/Card";
import {TextField} from "@/Components/Forms/TextField";

interface CategoryCardProps {
    readonly heading: string;
    readonly nameValue: string;
    readonly nameError: string | undefined;
    onChangeName: (name: string) => void;
    readonly descriptionValue: string;
    readonly descriptionError: string | undefined;
    onChangeDescription: (description: string) => void;
}

export function CategoryEditCard({
    heading,
    nameValue,
    nameError,
    onChangeName,
    descriptionValue,
    descriptionError,
    onChangeDescription,
}: CategoryCardProps) {
    return (
        <Card heading={heading}>
            <div className="mt-6 space-y-6 flex flex-col justify-center w-6/12">
                <TextField
                    fullWidth
                    name="name"
                    value={nameValue}
                    errors={nameError}
                    label="Name"
                    onChange={(event: React.ChangeEvent<HTMLInputElement>) =>
                        onChangeName(event.target.value)
                    }
                />

                <TextField
                    fullWidth
                    name="description"
                    value={descriptionValue}
                    errors={descriptionError}
                    label="Description"
                    onChange={(event: React.ChangeEvent<HTMLInputElement>) =>
                        onChangeDescription(event.target.value)
                    }
                />
            </div>
        </Card>
    );
}
